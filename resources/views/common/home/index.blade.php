@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="row text-center mb-5">
            <h1>URL Shortifyer</h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @if (Session::has('success'))
                <div class="col-md-8 mb-3">
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                </div>
            @endif
            <div class="col-md-8 mb-5">
                <form action="{{ route('short.url.post') }}" method="POST" >
                    @csrf
                    <div class="mb-3">
                        <label for="url" class="form-label">Url to be shortened</label>
                        <input type="url" name="url" id="url" class="form-control mb-4" placeholder="https://example.com"
                               autofocus required>
                        @error('url')<small class="text-danger mt-1">{{ $message }}</small>@enderror

                        <div class="row">
                            <div class="col-12 mb-2">
                                <h5>Time to live</h5>
                            </div>
                            <div class="col-md-4">
                                <label for="expire_in_h" class="form-label">Hours</label>
                                <input type="number" id="expire_in_h" name="expire_in_h" class="form-control" value="0" required />
                                @error('expire_in_h')<small class="text-danger mt-1">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-4">
                                <label for="expire_in_m" class="form-label">Minutes</label>
                                <input type="number" id="expire_in_m" name="expire_in_m" class="form-control" value="0" required>
                                @error('expire_in_m')<small class="text-danger mt-1">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-4">
                                <label for="expire_in_s" class="form-label">Seconds</label>
                                <input type="number" id="expire_in_s" name="expire_in_s" class="form-control" value="0" required>
                                @error('expire_in_s')<small class="text-danger mt-1">{{ $message }}</small>@enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table mt-5">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Short URL</th>
                        <th scope="col">Original URL</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($urls as $url)
                        <tr>
                            <th scope="row">{{ $url->id }}</th>
                            <td><a href="{{ route('short.url', $url->code) }}" target="_blank">{{ route('short.url', $url->code) }}</a></td>
                            <td>{{ $url->url }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
