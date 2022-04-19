<div class="table-full-width table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    Transaction no.
                </th>

                <th>
                   Number of Sold Item
                </th>
                <th>
                   Date Sold
                </th>
                <th>
                    Total kg Sold
                 </th>
                 <th>
                    Total amount Sold
                 </th>
                 <th>
                  Destination
                </th>
                <th>
                    Operated by
                 </th>
            </tr>
        </thead>
        <tbody>
               @forelse ($sales as $item)
               <tr>
                <td>
                   {{ $item->transaction_no }}
                </td>
                <td>
                    {{ $item->total_box_sold }}
                </td>
                <td >
                  {{ $item->date_sold }}
                </td>
                <td>
                    {{ $item->total_kg_sold }} kg
                </td>
                <td>
                    {{ $item->total_amount_sold }} kg
                </td>
                <td >
                 China
                  </td>
                <td >
                  {{ $item->user->name }}
                </td>

            </tr>
               @empty
               no data
               @endforelse
        </tbody>
        {{ $sales->links() }}
    </table>
</div>
