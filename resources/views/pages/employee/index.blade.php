@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="text-xl font-semibold">Employee</h1>
        <a href="{{ route('employee.create') }}" class="btn btn-accent text-white">Tambah</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-zebra-zebra">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>NIP</th>
                    <th>Position</th>
                </tr>
            </thead>
            @if (session()->has('success'))
            <div role="alert" class="alert alert-success mt-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif
            <tbody>
                @foreach ($items as $key => $item)
                    <tr class="bg-base-200">
                        <th>{{ $key + 1 }}</th>
                        <td><img src="{{ url('storage/'.$item->photo) }}" alt="" class="w-10 h-10 rounded-full"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->position->position_name }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('employee.edit', $item->id) }}"
                                class="btn btn-sm btn-warning text-white">Edit</a>
                            <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error text-white"
                                    onclick="confirm('Anda yakin ingin hapus data ini ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
