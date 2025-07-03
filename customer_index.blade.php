<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

</head>

<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4">Customer Management</h2>

        <!-- Form -->
        <form id="customerForm" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="balance" class="form-label">Enter Balance</label>
                <input type="text" name="balance" id="balance" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Customer</button>
        </form>

        <!-- Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Actions</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data -->
                <tr>
                    @foreach ($customers as $customer)

                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->balance}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>0000</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="card" id="message">

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        //  $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });


        $('#customerForm').on('submit', function (e) {
            e.preventDefault();

            // object formate  form no ma data create (name ,balance ) 
            let formdata = {
                name: $('#name').val(),
                balance: $('#balance').val(),
                //  _token: '{{ csrf_token() }}' // laravel nu csrf token passs
            };

            // Ajax request 
            $.ajax({
                url: '{{route('customers.store') }}',      // database insert ni file        
                method: 'POST',
                data: formdata,
                success: function (response) {
                    //$('#message').html('<p style:color:red>Data store successfully ! </p>');
                    $('#message').html('<p style="color:green">' + response.message + '</p>');
                    $('#customerForm')[0].reset();   //form ne rest 

                    // Optional: page reload karo ya table refresh
                    location.reload(); // only if table is static from blade
                },
                error: function (xhr) {
                    //  console.log(xhr.responseText); // 🧠 Actual error yahan print hoga
                    // $('#message').html('<p style="color:red;">Somthing went wrong. </p> ');
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        let msg = '';
                        $.each(errors, function (key, val) {
                            msg += val + '<br>';
                        });
                        $('#message').html('<p style="color:red;">' + msg + '</p>');
                    }

                }

            });


        });

        //  });
    </script>

</body>

</html>
