Hello {{$user->name}}
Thank you for create an account. Please veraify your account using this link:

<button><a href="{{ route('verify', $user->verification_token ?? '') }}">Click  to Verify</a></button>
