<?php 
class buku_tamu{

	private $db;

	function __construct($DB_con){
		$this->db = $DB_con;
	}

	public function tampildata($query,$tampil){
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			?>
			<tbody>
				<tr>
					<td><?php echo $row['tanggal']; ?></td>	
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['subject']; ?></td>
					<td><?php echo $row['isi']; ?></td>
					<?php if ($tampil=='admin'){ ?>
						<td align="center">
						<a href="?aksi=edit&id=<?php print($row['id']); ?>"><button type="button" class="btn btn-info">Edit</button></a>
	    </td>
	    <td align="center">
      <a href="delete.php?delete_id=<?php print($row['id']); ?>"><button type="button" class="btn btn-danger"> Hapus</button></a>
                </td>
					 <?php } ?>
				</tr>
			</tbody>
			<?php
		}
	}

	public function tambah($table,$nama,$subject,$isi)
	{
		try {
			$stmt = $this->db->prepare("INSERT INTO $table(nama,subject,isi) VALUES(:nama, :subject, :isi)");
			$stmt->bindparam(":nama",$nama);
			$stmt->bindparam(":subject",$subject);
			$stmt->bindparam(":isi",$isi);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			
		}
	}

}
?>