@extends('admin.layouts.app')

@section('title', 'Team')
@section('page-title', 'Team')
@section('page-subtitle', 'Manage teammates and assign their WhatsApp sender numbers')

@section('content')

@if(session('success'))
<div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">{{ session('error') }}</div>
@endif

{{-- Add Teammate --}}
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 mb-6">
    <h2 class="text-sm font-semibold text-slate-700 mb-4">Add Teammate</h2>
    <form method="POST" action="{{ route('admin.team.store') }}">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                       placeholder="Rahul Sharma">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                       placeholder="rahul@company.com">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Password</label>
                <input type="password" name="password" required
                       class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                       placeholder="Min 8 characters">
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Role</label>
                <select name="role" required
                        class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="sender" {{ old('role') === 'sender' ? 'selected' : '' }}>Sender — Quick Send only</option>
                    <option value="admin"  {{ old('role') === 'admin'  ? 'selected' : '' }}>Admin — Full access</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">
                    WhatsApp Phone Number ID
                    <span class="text-slate-400 font-normal ml-1">— from Meta Business Manager (optional, assign later)</span>
                </label>
                <input type="text" name="whatsapp_phone_number_id" value="{{ old('whatsapp_phone_number_id') }}"
                       class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-green-400"
                       placeholder="e.g. 1144304915427219">
            </div>
        </div>
        <button type="submit"
                class="text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:opacity-90 transition"
                style="background-color:#25D366;">
            + Add Teammate
        </button>
    </form>
</div>

{{-- Team Table --}}
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-5 py-3 border-b border-gray-100">
        <p class="text-sm font-semibold text-slate-700">{{ $users->count() }} member{{ $users->count() === 1 ? '' : 's' }}</p>
    </div>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 text-xs uppercase tracking-wide">
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Role</th>
                <th class="px-4 py-3 text-left">WhatsApp Phone Number ID</th>
                <th class="px-4 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($users as $user)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3 font-semibold text-gray-900">
                    {{ $user->name }}
                    @if($user->id === session('admin_user_id'))
                    <span class="text-xs text-slate-400 font-normal ml-1">(you)</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-gray-500 text-xs font-mono">{{ $user->email }}</td>
                <td class="px-4 py-3">
                    @if($user->role === 'admin')
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-purple-50 text-purple-700 border border-purple-200">Admin</span>
                    @else
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Sender</span>
                    @endif
                </td>
                <td class="px-4 py-3">
                    {{-- Inline edit form for Phone Number ID --}}
                    <form method="POST" action="{{ route('admin.team.update', $user) }}" class="flex items-center gap-2">
                        @csrf @method('PATCH')
                        <input type="text" name="whatsapp_phone_number_id"
                               value="{{ $user->whatsapp_phone_number_id }}"
                               placeholder="Not assigned"
                               class="border border-gray-200 rounded-lg px-2.5 py-1.5 text-xs font-mono w-48 focus:outline-none focus:ring-2 focus:ring-green-400">
                        <button type="submit"
                                class="text-xs bg-green-50 text-green-700 border border-green-200 px-2.5 py-1.5 rounded-lg hover:bg-green-100 transition whitespace-nowrap">
                            Save
                        </button>
                    </form>
                </td>
                <td class="px-4 py-3">
                    @if($user->id !== session('admin_user_id'))
                    <form method="POST" action="{{ route('admin.team.destroy', $user) }}"
                          onsubmit="return confirm('Remove {{ $user->name }} from the team?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="text-xs bg-red-50 text-red-600 border border-red-200 px-2.5 py-1 rounded-lg hover:bg-red-100 transition">
                            Remove
                        </button>
                    </form>
                    @else
                    <span class="text-xs text-slate-300">—</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-12 text-center text-gray-400 text-sm">No teammates yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
