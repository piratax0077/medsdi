<!DOCTYPE html>

<head>
    <title>Zoom MeetingSDK Local</title>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="origin-trial" content="">
</head>

<body>

    {{-- <script src="{{ asset('js/react.production.min.js') }}" ></script>
    <script src="{{ asset('js/react-dom.production.min.js') }}" ></script>
    <script src="{{ asset('js/redux.min.js') }}" ></script>
    <script src="{{ asset('js/redux-thunk.min.js') }}" ></script>
    <script src="{{ asset('js/lodash.min.js') }}" ></script>
    <script src="{{ asset('zoom/tool.js') }}"></script> --}}
    {{-- <script src="{{ asset('zoom/index.js') }}"></script> --}}
    <script src="{{ asset('zoom/meeting.min.js') }}"></script>
    <script>
        const simd = async () => WebAssembly.validate(new Uint8Array([0, 97, 115, 109, 1, 0, 0, 0, 1, 4, 1, 96, 0, 0, 3, 2, 1, 0, 10, 9, 1, 7, 0, 65, 0, 253, 15, 26, 11]))
        simd().then((res) => {
          console.log("simd check", res);
        });
    </script>
</body>

</html>
