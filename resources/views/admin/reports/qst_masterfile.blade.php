
{{-- @section('content') --}}
    <head>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <div class="qst_masterfile" style="width: 98%; padding:10px">
        <div class="row ml-3">
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label" for="from_date">Start Date: </label>
                            <input class="form-control" type="date" name="from_date" id="from_date">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label" for="from_date">Start Date: </label>
                            <input class="form-control" type="date" name="from_date" id="from_date">
                        </div>
                    </div>
                </div>
                <div class="radio-button-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="view">
                        <label class="form-check-label font-weight-bold text-sm" for="view">View Output</label>    
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="pdf">
                        <label class="form-check-label font-weight-bold text-sm" for="pdf">Export as PDF</label>    
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="csv">
                        <label class="form-check-label font-weight-bold text-sm" for="csv">Export as CSV</label>                
                    </div>
                </div>
                <button class="btn btn-primary btn-md mt-3">SUBMIT</button>    
            </div>
        </div>
    </div>
    <script>

    </script>
{{-- @endsection --}}
