@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold">Edit Position</h1>
        <a href="{{ route('position.index') }}" class="btn btn-error text-white">Back</a>
    </div>
    <div class="mt-10">
        <form action="{{ route('position.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" value="{{ $item->position_name }}" name="position_name"
                class="input input-bordered mb-3 w-full " />
            <input type="number" value="{{ $item->salary }}" name="salary" class="input input-bordered mb-3 w-full " />
            <input type="text" value="{{ $item->description }}" name="description"
                class="input input-bordered mb-3 w-full " />
            <button type="submit" class="btn btn-warning text-white">Simpan</button>
        </form>
    </div>
@endsection
