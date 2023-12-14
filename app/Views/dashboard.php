<h2>Dashboard</h2>
<p>Ini halaman dashboard</p>

<!-- menampilkan tren obat terakhir-->
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
 <thead style="background-color: #f2f2f2;">
     <tr>
         <?php foreach ($fields as $field): ?>
             <th style="padding: 10px; border: 1px solid #ddd;"><?= $field ?></th>
         <?php endforeach; ?>
     </tr>
 </thead>
 <tbody>
     <?php foreach ($data as $row): ?>
         <tr>
             <?php foreach ($fields as $field): ?>
                <td style="padding: 10px; border: 1px solid #ddd;"><?= $row->$field ?></td>
             <?php endforeach; ?>
         </tr>
     <?php endforeach; ?>
 </tbody>
</table>