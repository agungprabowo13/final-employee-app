@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold">Tambah Position</h1>
        <a href="{{ route('position.index') }}" class="btn btn-error text-white">Back</a>
    </div>
    <div class="mt-10">
        <form action="{{ route('position.store') }}" method="POST">
            @csrf
            <input type="text" name="position_name" placeholder="Position Name" class="input input-bordered mb-3 w-full " />
            @error('position_name')
                <div role="alert" class="alert alert-ghost mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <input type="number" name="salary" placeholder="Salary" class="input input-bordered mb-3 w-full " />
            @error('position_name')
                <div role="alert" class="alert alert-ghost mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <input type="text" name="description" placeholder="Description" class="input input-bordered mb-3 w-full " />
            <button type="submit" class="btn btn-accent text-white">Tambah</button>
        </form>
    </div>
@endsection
