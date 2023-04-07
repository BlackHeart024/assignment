<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>student login</title>
	<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example</title>
	<style>
	section{
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    min-height: 100vh;
	    width: 100%;
	    background: url('asset/img/background.jpg')no-repeat;
	    background-position: center;
	    background-size: cover;
	}
	.form-box{
	    position: relative;
	    width: 400px;
	    height: 450px;
	    background: transparent;
	    border: 2px solid rgba(225,225,225,0.5);
	    border-radius: 20px;
	    backdrop-filter: blur(15px);
	    display: flex;
	    justify-content: center;
	    align-items: center;
	}
	h2{
	    font-size: 2em;
	    color: #fff;
	    text-align: center;
	}
	.inputbox{
	    position: relative;
	    margin: 30px 0;
	    width: 310px;
	    border-bottom: 2px solid #fff;
	}
	.inputbox label{
	    position: absolute;
	    top: 50%;
	    left: 5px;
	    transform: translateY(-50%);
	    color: #fff;
	    font-size: 1rem;
	    pointer-events: none;
	    transition: .5s;
	}
	input:focus ~ label,
	input:valid ~ label{
	    top: -5px;
	}
	.inputbox input{
	    width: 100%;
	    height: 50px;
	    background: transparent;
	    border: none;
	    outline: none;
	    font-size: 1rem;
	    padding: 0 35px 0 5px;
	    color: #fff;
	}
	.inputbox ion-icon{
	    position: absolute;
	    right: 8px;
	    color: #fff;
	    font-size: 1.2rem;
	    top: 20px;
	}
	.forget{
	    margin: -15px 0 15px;
	    font-size: .9em;
	    color: #fff;
	    display: flex;
	    justify-content: center;
	}
	.forget label input{
	    margin-right: 3px;
	}
	.forget label a{
	    color: #fff;
	    text-decoration: none;
	}
	.forget label a:hover{
	    text-decoration: underline;
	}
	button{
	    width: 100%;
	    height: 40px;
	    border-radius: 40px;
	    background: #fff;
	    border: none;
	    outline: none;
	    cursor: pointer;
	    font-size: 1em;
	    font-weight: 600;
	}
	.register{
	    font-size: .9em;
	    color: #fff;
	    text-align: center;
	    margin: 25px 0 10px;
	}
	.register p a{
	    text-decoration: none;
	    color: #fff;
	    font-weight: 600;
	}
	.register p a:hover{
	    text-decoration: underline;
	}
	</style>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form class="signup-form" method="POST" action="{{url('login')}}">
                	{{ csrf_field()}}
                    <h2>Login</h2>
                    @if(session('mail'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						{{session('mail')}}
					</div>
					@endif
					@if(session('pass'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						{{session('pass')}}
					</div>
					@endif
					@if(session('status'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						{{session('status')}}
					</div>
					@endif
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="Email" id="email" class="rounded mr-3" value="{{old('Email')}}" required>
                        <label for="">Email</label>
                    </div>
                    <span class="text-danger">
						@error('Email')
						{{$message}}
						@enderror
					</span>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="Password" id="password" class="rounded mr-3" required>
                        <label for="">Password</label>
                    </div>
                    <span class="text-danger">
						@error('Password')
						{{$message}}
						@enderror
					</span>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me &nbsp;&nbsp;<a href="#">Forgot Password</a></label>
                    </div>
                    <button type="submit">Log In</button>
                    <div class="register">
                        <p>Don't have a account <a href="{{route('Register')}}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>