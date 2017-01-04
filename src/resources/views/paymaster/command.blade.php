<Command>
@foreach($paymasterData as $key => $value)
    <{{$key}}>{{$value}}</{{$key}}>
@endforeach
    <LMI_HASH>{{!empty($hash) ? $hash : ''}}</LMI_HASH>
</Command>