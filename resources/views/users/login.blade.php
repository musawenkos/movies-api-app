<x-layout>
    <div class="d-flex flex-row justify-content-center" style="margin-top: 13%;color:white ">
        <form method="POST" action="/users/login" class=" border border-gray-200 rounded p-2" style="box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
            @csrf
            <div class="row mb-1">
                <label
                    for="email"
                    class="inline-block text-lg"
                    style="font-size: 13px"
                >
                    Email
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 ms-3 me-1"
                    style="width:90%"
                    name="email"
                    value="{{old('email')}}"
                />
                @error('email')
                    <p style="color:red;font-size:11px">{{$message}}</p>
                @enderror
            </div>
            <div class="row mb-1">
                <label
                    for="password"
                    class="inline-block text-lg"
                    style="font-size: 13px"
                >
                    Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 ms-3 me-1"
                    style="width:90%"
                    name="password"
                    value="{{old('password')}}"
                />
                @error('password')
                    <p style="color:red;font-size:11px">{{$message}}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-end mt-2">
                <input
                    type="submit"
                    class="btn btn-primary me-3"
                    style="width:30%;color:black; text-align:center"
                    value="Login"
                />
            </div>
        </form>
    </div>
</x-layout>
