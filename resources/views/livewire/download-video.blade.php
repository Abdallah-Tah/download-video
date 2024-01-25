<div style="margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);" class="w-50">
    <input type="text" wire:model="url" placeholder="Enter video URL" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px;"
    wire:keydown.enter="playVideo">

    {{-- @if($runVideo)
    <div style="margin-bottom: 20px;">
        <video width="100%" height="auto" controls>
            <source src="{{ $url }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
@endif --}}

    <button wire:click="downloadVideo()" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        Download
    </button>
</div>
