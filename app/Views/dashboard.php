<h2>Dashboard</h2>
<p>Ini halaman dashboard</p>

<!-- menampilkan tren obat terakhir-->
<table>
 <thead>
     <tr>
         <?php foreach ($fields as $field): ?>
             <th><?= $field ?></th>
         <?php endforeach; ?>
     </tr>
 </thead>
 <tbody>
     <?php foreach ($data as $row): ?>
         <tr>
             <?php foreach ($fields as $field): ?>
                <td><?= $row->$field ?></td>
             <?php endforeach; ?>
         </tr>
     <?php endforeach; ?>
 </tbody>
</table>