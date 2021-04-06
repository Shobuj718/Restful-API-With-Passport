Hello {{$user->name}} <br>
You changed your email address.we need to confirm your new address. please use this link below to confirm your email.
<br>

<button><a href="{{ route('verify', $user->verification_token) }}">Click  to Verify</a></button>
