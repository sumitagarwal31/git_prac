<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <table class="table">
                    <h2>New Transaction</h2>
                    <form action=" {!! url('/submit') !!}" method="POST">
                        <div class="form-group">
                            <label for="card">Transaction Type</label>
                            <input class="form-control" type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        </div>
                        <div class="form-group">
                            <select class='form-control' required name="transaction_type">
                                <option value="credit">Credit</option>
                                <option value="debit">Debit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input class="form-control" required type="number" id="amount" name="amount" min="1">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" required name="description" required placeholder='Enter Text'></textarea>
                        </div>
                        <input type="submit" class='btn btn-primary'> 
                    </form>
                        <a href="/"><button class="btn btn-light btn-close">Cancel</button></a>
                </table>
            </div>
        </div>
    </div>
    <!--container-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>