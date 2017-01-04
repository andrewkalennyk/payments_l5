<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Redirect</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
<form action="https://lmi.paymaster.ua/" id="form" method="post">
    @if(!empty($params))
        @foreach($params as $key => $param)
            <input type="hidden" name="{{$key}}" value="{{$param}}" />
        @endforeach
    @endif
</form>
<script>
    $(document).ready(function() {
        $("#form").submit();
    });
</script>
</body>
</html>