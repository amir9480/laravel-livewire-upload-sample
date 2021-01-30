<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <label for="fileTitle">Title</label>
                    <input type="text" wire:model="title" class="form-control" id="fileTitle">
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" wire:model="file" class="custom-file-input" id="theFile">
                        <label class="custom-file-label" for="theFile">Choose file</label>
                        <div wire:loading wire:target="file">Uploading...</div>
                        @error('file') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            @if ($file)
                                <a href="{{ $file->temporaryUrl() }}" target="_blank">
                                    <img src="{{ $file->temporaryUrl() }}" height="200">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">Submit</button>
            </form>
            <hr>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-6 offset-3">
            <ul class="list-group">
                @foreach ($files as $file)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ $file->link }}" target="_blank">
                                <img src="{{ $file->link }}" height="100">
                            </a>
                            {{ $file->title }}
                        </div>
                        <button class="btn btn-sm btn-danger" wire:click="remove({{ $file->id }})">Delete</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
