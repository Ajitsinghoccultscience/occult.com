@extends('admin.layout')
@section('title', 'Image Library')
@section('page-title', 'Image Library')
@section('breadcrumb', 'Upload images and copy URLs for use in HTML sections')

@section('content')

{{-- Upload area --}}
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 mb-6">
    <h2 class="font-bold text-slate-800 mb-1">📤 Upload Image</h2>
    <p class="text-slate-400 text-xs mb-4">JPG, PNG, GIF, WebP, SVG — max 5MB</p>

    <form method="POST" action="{{ route('admin.images.store') }}" enctype="multipart/form-data"
          class="flex gap-3 flex-wrap items-end">
        @csrf
        <div class="flex-1 min-w-64">
            <input type="file" name="image" accept="image/*" required
                class="block w-full text-sm text-slate-600
                    file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0
                    file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700
                    hover:file:bg-indigo-100 cursor-pointer">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl transition text-sm flex-shrink-0">
            Upload
        </button>
    </form>

    @if (session('uploaded_url'))
    <div class="mt-4 bg-emerald-50 border border-emerald-200 rounded-xl p-4">
        <p class="text-emerald-800 text-sm font-semibold mb-1">✅ Uploaded! Copy this URL to use in your HTML:</p>
        <p class="text-emerald-600 text-xs mb-2">This is a relative URL — it works on localhost AND on your live site.</p>
        <div class="flex gap-2 items-center">
            <input type="text" value="{{ session('uploaded_url') }}" readonly id="new-url"
                class="flex-1 text-sm border border-emerald-200 rounded-lg px-3 py-2 bg-white font-mono text-slate-700">
            <button onclick="copyUrl('new-url', this)"
                class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm px-4 py-2 rounded-lg font-semibold transition flex-shrink-0">
                Copy URL
            </button>
        </div>
    </div>
    @endif
</div>

{{-- Tip --}}
<div class="bg-amber-50 border border-amber-100 rounded-xl p-4 mb-6 text-sm text-amber-800 flex gap-2">
    <span>💡</span>
    <span>Upload your image → copy the URL → paste it into your ChatGPT prompt:
    <em>"Use this image URL: https://yoursite.com/uploads/..."</em></span>
</div>

{{-- Image grid --}}
@if (empty($files))
    <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-16 text-center">
        <div class="text-5xl mb-4">🖼️</div>
        <p class="text-slate-400 text-sm">No images uploaded yet. Upload one above!</p>
    </div>
@else
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
        @foreach ($files as $i => $file)
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden group hover:border-indigo-200 transition">
            <div class="aspect-square bg-slate-50 overflow-hidden">
                <img src="{{ $file['url'] }}" alt="{{ $file['name'] }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
            </div>
            <div class="p-3">
                <p class="text-xs text-slate-500 truncate mb-0.5 font-medium" title="{{ $file['name'] }}">{{ $file['name'] }}</p>
                <p class="text-xs text-slate-400 mb-2">{{ $file['size'] }}</p>
                <div class="flex gap-1.5">
                    <input type="text" value="{{ $file['copy_url'] }}" readonly id="url-{{ $i }}"
                        class="flex-1 text-xs border border-slate-200 rounded-lg px-2 py-1.5 bg-slate-50 font-mono truncate min-w-0">
                    <button onclick="copyUrl('url-{{ $i }}', this)" title="Copy URL"
                        class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 text-sm px-2 py-1.5 rounded-lg font-medium transition flex-shrink-0">
                        📋
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.images.destroy', $file['name']) }}"
                      onsubmit="return confirm('Delete this image?')" class="mt-1.5">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="w-full text-xs text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg py-1 transition">
                        🗑 Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif

<script>
function copyUrl(inputId, btn) {
    const input = document.getElementById(inputId);
    input.select();
    navigator.clipboard.writeText(input.value).then(() => {
        const orig = btn.innerHTML;
        btn.innerHTML = '✅';
        btn.classList.add('bg-emerald-100', 'text-emerald-600');
        setTimeout(() => {
            btn.innerHTML = orig;
            btn.classList.remove('bg-emerald-100', 'text-emerald-600');
        }, 1500);
    });
}
</script>
@endsection
