<input id='file' type='file' onchange='sendfile(this.files)'>
<script>
function sendfile(f) {
	//var max = <?= (int)ini_get('upload_max_filesize') ?> * 1024 * 1024;
	var max = 8;
	var fr = new FileReader();
	fr.onload = function(event) {
		var fcontent = event.target.result; //
		var fsize = fcontent.byteLength; //it return size of file in bytes //10000
		var chunksize = parseInt(fsize / max) - 1000;
		var i = 0, t = Math.ceil(fsize / chunksize);  //3
		while(1) //inifinite 
		{
			var ahr = new XMLHttpRequest();
			ahr.open('POST', 'savefile.php?i=' + i + '&t=' + t + '&fname=' + encodeURIComponent(f[0].name));
			ahr.send(fcontent.slice(i * chunksize, (i * chunksize) + chunksize));
			console.log(i++); //2
			fsize -= chunksize; //-2000
			if(fsize <= 0)
				break;
		}
	}
	fr.readAsArrayBuffer(f[0]);
}
</script>
