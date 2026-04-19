@extends('admin.layout')
@section('title', $funnel ? 'Rename Funnel' : 'Create Funnel')
@section('page-title', $funnel ? 'Rename Funnel' : 'Create New Funnel')
@section('breadcrumb', $funnel ? 'Funnels / ' . $funnel->name : 'Funnels / New Funnel')

@section('header-actions')
    <a href="{{ route('admin.funnels.index') }}"
       class="text-sm text-slate-500 hover:text-slate-700 font-medium px-4 py-2 rounded-lg hover:bg-slate-100 transition">
        ← Back
    </a>
@endsection

@section('content')
<div class="max-w-lg">
    @if (!$funnel)
    <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 mb-6 text-sm text-indigo-800 flex gap-3">
        <span class="text-xl">💡</span>
        <span>Give your funnel a name (e.g. "Astrology Campaign"). You'll add pages to it on the next screen.</span>
    </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <form method="POST"
              action="{{ $funnel ? route('admin.funnels.update', $funnel) : route('admin.funnels.store') }}">
            @csrf
            @if ($funnel) @method('PUT') @endif

            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Funnel Name</label>
                <input type="text" name="name" value="{{ old('name', $funnel?->name) }}"
                    placeholder="e.g. Astrology Funnel, Graphology Campaign"
                    class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    required autofocus>
                @error('name')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-xl transition text-sm shadow-sm">
                    {{ $funnel ? 'Save Changes' : 'Create Funnel & Add Pages →' }}
                </button>
                <a href="{{ route('admin.funnels.index') }}"
                   class="text-slate-500 hover:text-slate-700 font-medium px-4 py-3 text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
