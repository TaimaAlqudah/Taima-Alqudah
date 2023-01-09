
<style media="screen">
    .box{
    background-color: #fff !important;
    padding:20px !important;
    border-radius: 5px !important;
    box-shadow: 0 5px 10px rgba(0,0,0,.2) !important;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container box p-5 my-5 w-50">
    <h1 class="text-center my-3">Login</h1>
    <form method="POST" action="/login">
        <!-- Email input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="email">Email address</label>
            <input type="email" id="email" name="email" class="form-control" />
    
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" />
          
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" checked />
                    <label class="form-check-label" for="remember_me"> Remember me </label>
                </div>
            </div>
        </div>

        <div class="text-center"><button type="submit" class="btn btn-primary btn-block mb-4 mx-auto">Sign in</button></div>

        <!-- Submit button -->
        
    </form>

    </div>

</body>
</html>
