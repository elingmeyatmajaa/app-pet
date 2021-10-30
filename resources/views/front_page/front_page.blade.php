<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
</head>

<body>
    <br>
    <div class="container">
        <br>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <form action="/orders" method="POST">
            {{csrf_field()}}
            <section>
                <div class="panel panel-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="customer_name" class="form-control" placeholder="Please enter your name ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="customer_address" class="form-control" placeholder="Please enter your address  ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-footer">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Budget</th>
                                <th>Amount</th>
                                <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="product_name[]" class="form-control" required=""></td>
                                <td><input type="text" name="brand[]" class="form-control" required=""></td>
                                <td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>
                                <td><input type="text" name="budget[]" class="form-control budget" required=""></td>
                                <td><input type="text" name="amount[]" class="form-control amount" required=""></td>
                                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none">
                                </td>
                                <td style="border: none">
                                </td>
                                <td style="border: none">
                                </td>
                                <td>Total</td>
                                <td><b class="total"></b></td>
                                <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        </form>
    </div>

    <script type="text/javascript">
        $('tbody').delegate('.quantity,.budget', 'keyup',
            function() {
                var tr = $(this).parent().parent();
                var quantity = tr.find('.quantity').val();
                var budget = tr.find('.budget').val();
                var amount = (quantity * budget);
                tr.find('.amount').val(amount);
                total();
            });

        function total() {
            var total = 0;
            $('.amount').each(function(i, e) {
                var amount = $(this).val() - 0;
                total += amount;
            });
            $('.total').html(total);
        }

        $('.addRow').on('click', function() {
            addRow();
        });

        function addRow() {
            var tr = '<tr>' +
                '<td><input type="text" name="product_name[]" class="form-control" required=""></td>' +
                '<td><input type="text" name="brand[]" class="form-control" required=""></td>' +
                '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>' +
                '<td><input type="text" name="budget[]" class="form-control budget" required=""></td>' +
                '<td><input type="text" name="amount[]" class="form-control amount" required=""></td>' +
                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>' +
                '</tr>';
            $('tbody').append(tr);
        };


        $('.remove').live("click", function() {
            var last = $('tbody tr').length;
            if (last == 1) {
                alert("You cannot last row")
            } else {
                $(this).parent().parent().remove();
            }

        });
    </script>


</body>


</html>