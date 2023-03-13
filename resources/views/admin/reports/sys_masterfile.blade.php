<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<div class="sys_masterfile" style="width: 98%; padding:10px">
    <center><h4>Systems Masterfile</h4></center>
    <hr>
    <form class="sysForm" id="sysForm" target="_blank" action="{{url('get/systems_masterfile')}}">
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
                            <label class="form-label" for="from_date">End Date: </label>
                            <input class="form-control" type="date" name="to_date" id="to_date">
                        </div>
                    </div>
                </div>
                {{-- <div>
                    <select name="" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="">Inactive</option>
                    </select>
                </div> --}}
                <div class="radio-button-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="view" value="view">
                        <label class="form-check-label font-weight-bold text-sm" for="view">View Output</label>    
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="pdf" value="pdf">
                        <label class="form-check-label font-weight-bold text-sm" for="pdf">Export as PDF</label>    
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="csv" value="csv">
                        <label class="form-check-label" for="csv">Export as CSV</label>                
                    </div>
                </div>
                <button class="btn btn-primary btn-md mt-3">SUBMIT</button>    
            </div>
        </div>
    </form>
</div>
<script src="{{asset('js/swal.js')}}"></script>
    <script>
        const form = document.getElementById('sysForm');
        const rbt = document.getElementsByName('type');

        let radioButtonsChecked = false;

        form.addEventListener('submit', function(e){
            e.preventDefault();
            for (let i = 0; i < rbt.length; i++){
                if(rbt[i].checked){
                    radioButtonsChecked = true;
                    break;
                }
            }
            if(!radioButtonsChecked){
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Kindly choose which type of report you want to generate',
                });
            } else {
                form.submit();
            }
        });
    </script>

