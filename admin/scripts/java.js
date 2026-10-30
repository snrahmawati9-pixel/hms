function getDelete(id)
{
	respon=window.confirm("Are you sure to delete?");
	if(respon == true)
	{
		window.location="admin.php?id="+id;
	}
}

function getDeleteKategori(id)
{
	respon=window.confirm("Are you sure to delete?");
	if(respon == true)
	{
		window.location="kategori.php?id="+id;
	}
}
function getDeleteProduct(id)
{
	respon=window.confirm("Are you sure to delete?");
	if(respon == true)
	{
		window.location="product.php?id="+id;
	}
}