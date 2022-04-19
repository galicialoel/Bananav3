<!DOCTYPE html>
<html>
<head>
<style>
    
  div.b {
        margin: 15px;
  text-align: center;
}
    div.a {
        margin: 50px;
  text-align: center;
}

table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}

div.side {
  position: absolute;
  right: auto;
  width: 100px;
} 
</style>
</head>
<body>
<div class="a">
    <h2>SUNFOODS AGRI. VENTURES, INC. MARIBULAN, ALABEL, SARANGANI PROVINCE HARVEST RECEIVING REPORT</h2>
</div>

<div class="side">
    <div>
        Date: {{$date}}
    </div>
  

</div>
<div class="b">
    <h4>
        PRODUCTION
    </h4>
</div>

<table>
  <tr>
    <th>Transaction No.</th>
    <th>Classification</th>
    <th>Destination</th>
    <th>Remarks</th>
    <th>Initial Total Boxes</th>
    <th>Initial Total Amount</th>
    <th>Transaction Date</th>
  </tr>
  @forelse($sales as $item)
  <tr>
    <td>
        {{$item->transaction_no}}
    </td>
    <td>
        <div>
             Class A: {{$item->class_a_total}} boxes
        </div>
        <div>
             Class B: {{$item->class_b_total}} boxes
        </div>
    </td>
    <td>
        China
    </td>
    <td>14Kgs</td>
    <td>{{$item->total_box_sold}}</td>
    <td>{{$item->total_amount_sold}}</td>
    <td>{{$item->created_at}}</td>
  </tr>
  @empty
  no data
  @endforelse
  
 
  
</table>
<h4>
    GRAND TOTAL (BOXES): {{$sales->sum('total_box_sold')}}
</h4>
<h4>
GRAND TOTAL (AMOUNT): Php. {{$sales->sum('total_amount_sold')}}
</h4>

</body>
</html>


