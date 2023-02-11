<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autohub Rating</title>
    <style type="text/css">
            @page {
                margin: 2cm;
            }
            *{
                font-family: 'Arial', sans-serif;
            }
            table{
                margin: 10px 0 20px 0;
                width: 100%;
                
            }
            thead{
                background-color: #222831;
                color: #FFD369;
            }
            th{
                padding: 4px;
            }
            td{
                padding: 2px;
            }
            tbody tr:nth-child(even){
                background-color: #EEEEEE;
            }
            .center-aligned{
                text-align: center;
            }
            /* .header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; } */
            .footer { position: fixed; left: 575px; bottom: -180px; right: 0px; height: 150px; }
            .footer .page:after { content: counter(page, upper-roman); }
    </style>
</head>
<body>
    {{-- <div class="header">

    </div> --}}
    <div class="footer">
        <p class="page">Page <?php $PAGE_NUM ?></p>
    </div>
    <div>
        <div class="center-aligned">
            <div>
                <label for=""><strong>{{ $report_title }}</strong></label>
            </div>
        </div>

        <div>
            @foreach($data as $row)
                <hr/>
                <em><small>Total: {{$row->total}}</small></em>
                @if(!empty($row->total))
                    <table>
                        <thead>
                            @foreach ($table_headers as $header)
                                    <th> {{ $header }} </th>
                                @endforeach
                        </thead>
                        <tbody>
                            @for($i = 0; $i < $row->total; $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    @foreach($table_body as $data)
                                        <td>{{$row->list[$i]->$data}}</td>
                                    @endforeach
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                @else
                    <p class="center-aligned"><em class="center-aligned"> No data to show. </em></p>
                @endif
            @endforeach
            {{-- <p style="page-break-before: always;">the second page</p> --}}
        </div>
    </div>
    {{-- <script type="text/php">  --}}
        @php
        if (isset($pdf)) { 
            //Shows number center-bottom of A4 page with $x,$y values
            $x = 250;  //X-axis i.e. vertical position 
            $y = 820; //Y-axis horizontal position
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  //format of display message
            $font =  $fontMetrics->get_font("helvetica");
            $size = 10;
            $color = array(0, 0, 0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text(250,10,'HEADER: GGG',$font,$size,$color,$word_space,$char_space,$angle);
            // footer
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
        @endphp
    {{-- </script>  --}}
</body>
</html>