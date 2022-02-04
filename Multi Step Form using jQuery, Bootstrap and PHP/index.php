
<!DOCTYPE html>
<html>
    <head>
        <title>jQuery Multi Step Form Wizard Plugin With Demo</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-8">
                    <form id="myForm" action="store-data.php" method="POST">
                        <h4 class="text-center">Multi step registration form</h4>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step">1</span>
                            <span class="step">2</span>
                            <span class="step">3</span>
                            <span class="step">4</span>
                        </div>


                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">Name:
                            <p><input placeholder="First name" name="fname" class="form-control"></p>
                            <p><input placeholder="Last name" name="lname" class="form-control"></p>
                        </div>
                        <div class="tab">Contact Info:
                            <p><input placeholder="Email" name="email" class="form-control"></p>
                            <p><input placeholder="Phone" name="phone" class="form-control"></p>
                        </div>
                        <div class="tab">Birthday:
                            <p><input placeholder="dd" name="date" class="form-control"></p>
                            <p><input placeholder="mm" name="month" class="form-control"></p>
                            <p><input placeholder="yyyy" name="year" class="form-control"></p>
                        </div>
                        <div class="tab">Login Info:
                            <p><input placeholder="Username" name="username" class="form-control"></p>
                            <p><input placeholder="Password" name="password" type="password" class="form-control"></p>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right; margin-top: 5px;">
                                <button type="button" class="previous btn-primary">Previous</button>
                                <button type="button" class="next btn-primary">Next</button>
                                <button type="button" class="submit btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
        <script src="custom.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $.validator.addMethod('date', function (value, element, param) {
                    return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
                }, 'Please enter a valid date!');
                $.validator.addMethod('month', function (value, element, param) {
                    return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
                }, 'Please enter a valid month!');
                $.validator.addMethod('year', function (value, element, param) {
                    return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
                }, 'Please enter a valid year not less than 1900!');
                $.validator.addMethod('username', function (value, element, param) {
                    var nameRegex = /^[a-zA-Z0-9]+$/;
                    return value.match(nameRegex);
                }, 'Only a-z, A-Z, 0-9 characters are allowed');

                var val = {
                    // Specify validation rules
                    rules: {
                        fname: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            digits: true
                        },
                        date: {
                            date: true,
                            required: true,
                            minlength: 2,
                            maxlength: 2,
                            digits: true
                        },
                        month: {
                            month: true,
                            required: true,
                            minlength: 2,
                            maxlength: 2,
                            digits: true
                        },
                        year: {
                            year: true,
                            required: true,
                            minlength: 4,
                            maxlength: 4,
                            digits: true
                        },
                        username: {
                            username: true,
                            required: true,
                            minlength: 4,
                            maxlength: 16,
                        },
                        password: {
                            required: true,
                            minlength: 8,
                            maxlength: 16,
                        }
                    },
                    // Specify validation error messages
                    messages: {
                        fname: "First name is required",
                        email: {
                            required: "Email is required",
                            email: "Please enter a valid e-mail",
                        },
                        phone: {
                            required: "Phone number is requied",
                            minlength: "Please enter 10 digit mobile number",
                            maxlength: "Please enter 10 digit mobile number",
                            digits: "Only numbers are allowed in this field"
                        },
                        date: {
                            required: "Date is required",
                            minlength: "Date should be a 2 digit number, e.i., 01 or 20",
                            maxlength: "Date should be a 2 digit number, e.i., 01 or 20",
                            digits: "Date should be a number"
                        },
                        month: {
                            required: "Month is required",
                            minlength: "Month should be a 2 digit number, e.i., 01 or 12",
                            maxlength: "Month should be a 2 digit number, e.i., 01 or 12",
                            digits: "Only numbers are allowed in this field"
                        },
                        year: {
                            required: "Year is required",
                            minlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                            maxlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                            digits: "Only numbers are allowed in this field"
                        },
                        username: {
                            required: "Username is required",
                            minlength: "Username should be minimum 4 characters",
                            maxlength: "Username should be maximum 16 characters",
                        },
                        password: {
                            required: "Password is required",
                            minlength: "Password should be minimum 8 characters",
                            maxlength: "Password should be maximum 16 characters",
                        }
                    }
                }
                $("#myForm").multiStepForm(
                        {
                            // defaultStep:0,
                            beforeSubmit: function (form, submit) {
                                console.log("called before submiting the form");
                                console.log(form);
                                console.log(submit);
                            },
                            validations: val,
                        }
                ).navigateTo(0);
            });
        </script>

    </body>
</html>