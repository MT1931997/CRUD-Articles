@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Articles</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Create Article</a>
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('articles.data') }}",
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'content', name: 'content' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush