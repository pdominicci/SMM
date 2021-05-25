@if ($message = Session::get('success'))
    <div role="alert">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            {{__('Success')}}
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{ $message }}</p>
        </div>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div role="alert">
        <div class="bg-yellow-500 text-white font-bold rounded-t px-4 py-2">
            {{__('Warning')}}
        </div>
        <div class="border border-t-0 border-yellow-400 rounded-b bg-yellow-100 px-4 py-3 text-yellow-700">
            <p>{{ $message }}</p>
        </div>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            {{__('Danger')}}
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{ $message }}</p>
        </div>
    </div>
@endif
