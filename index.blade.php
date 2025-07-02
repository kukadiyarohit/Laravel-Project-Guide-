<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4">Customer Management</h2>

        <!-- Form -->
        <form action="{{route('customers.store')}}" method="POST" class="mb-4">
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

        <div class="card">
            <h5>Jqary Events </h5>
            <input type="text" id="input">
            <button id="btn">click</button>
            <p id="p1">This is p tag : click me -here </p>

            <button id="add">Add New Button</button>
            {{-- <h5>in this div tag add new button </h5> --}}
            <div id="container">
            </div>


            <div id="box">
                <p>Original Text</p>
                <p>append () method use : </p>
            </div>
            <button id="addBtn">Add More</button>



        </div>
    </div>

    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

    <script>
        $(document).ready(function () {
            $('#input').click(function () {
                alert('this is click event!');
            });

            $('#btn').click(function () {
                alert('Jay shree krishna , jay shree Ram');
            });

            $('#p1').on('click', function () {
                $(this).text('clicked 1 time  ');
            });


            // how to work click button "Add new button " : than div section dynamic a new button loaded 

            // Add new button dynamically
            $('#add').click(function () {
                $('#container').append('<button class="newBtn">New Button</button>');
            });

            // Click event for new buttons - works only with .on()
            $('#container').on('click', '.newBtn', function () {
                alert('Dynamically added button clicked!');
            });

            //2 .append()
            //.append() jQuery ka ek method hai jo kisi element ke andar content ya naya HTML add karne ke liye use hota hai — "andar se last me chipkana" samjho
            // example of append ()  
            $('#addBtn').click(function () {
                $('#box').append('<p>Added using .append()</p>');
            });


        });
    </script>

</body>

</html>