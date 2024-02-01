@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold">Edit Employee</h1>
        <a href="{{ route('employee.index') }}" class="btn btn-error text-white">Back</a>
    </div>
    <div class="mt-10">
        <form action="{{ route('employee.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $item->name }}" class="input input-bordered mb-3 w-full " />
            @error('name')
                <div role="alert" class="alert alert-ghost mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <input type="number" name="nip" value="{{ $item->nip }}" class="input input-bordered mb-3 w-full " />
            @error('nip')
                <div role="alert" class="alert alert-ghost mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <select name="position_id" id="" class="select select-bordered  w-full mb-3">
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $position->id == $item->id ? 'SELECTED' : '' }}>
                        {{ $position->position_name }}</option>
                @endforeach
            </select>
            <input type="file" name="photo" class="input input-bordered w-full mb-3 p-3" accept="image/*">
            <button type="submit" class="btn btn-accent text-white">Simpan</button>
        </form>
    </div>
@endsection
