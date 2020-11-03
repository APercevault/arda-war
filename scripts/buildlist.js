function ReBuildView() {
	    var HTML     = '<div id="menu_flotas">';
			HTML    += '<div id="lista_misiones">';
        $.each(data.build, function(index, val) {
                if (index == 0) {
						HTML    += '<div class="misiones_top"></div>';
						HTML    += '<div class="misiones">';
						HTML    += '<center>';
						HTML    += '<img src="styles/theme/'+data.raza_skin+'/gebaeude/'+val.element+'.png" width="140" height="140" />';
						HTML    += '<br><b>'+val.name+' : '+val.level+' '+val.mode+'</b><div id="progressbar"></div>';
				if (data.total == 1) {						
                        HTML    += '<div id="blc"></div>';
									  } else {HTML    += '<div id="blc1">'}						
						HTML    += '</center>';
						HTML    += '</div>';
						HTML    += '<div class="misiones_footer"></div>';
                } else {
                        HTML    += '<div class="misiones_top"></div>';
						HTML    += '<div class="misiones"><div class="encola_ajust_c">';
						HTML    += '<center>';						
					    HTML    += '<img class="tooltip" name="'+val.name+'" src="styles/theme/'+data.raza_skin+'/gebaeude/'+val.element+'.png" width="40" height="40" />';
						HTML    += '<br><b>'+val.name+' : '+val.level;						
						
						
				if (data.total == 2 && index == 1) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 3 && index == 2) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 4 && index == 3) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 5 && index == 4) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 6 && index == 5) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 7 && index == 6) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 8 && index == 7) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 9 && index == 8) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 10 && index == 9) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 11 && index == 10) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
				if (data.total == 12 && index == 11) {
                        HTML    += '<a href="game.php?page=buildings&amp;cmd=remove&amp;listid='+(index+1)+'"><div class="cancelar_c_small1">'+data.bd_cancel+'</div></a>';
									 }						
						HTML    += '</div>';
						HTML    += '</center>';							
						HTML    += '</div>';
						HTML    += '<div class="misiones_footer"></div>';
                }
                /*HTML    += '<span style="color:#0565ae"><b>'+getFormatedDate(val.endtime * 1000, '[d]. [M] [y] [H]:[i]:[s]')+'</b></span>';*/
        });
		HTML    += '</div>';
		HTML    += '</div>';
        $('#buildlist').html(HTML).fadeIn("fast");
        $('#progressbar').progressbar({value: ((data.build[0].time != 0) ? 100 - ((data.build[0].endtime - (serverTime.getTime() / 1000) + ServerTimezoneOffset) / data.build[0].time) * 100 :100)});
        $('.ui-progressbar-value').addClass('ui-corner-right').animate({width: "100%" }, data.build[0].endtime * 1000 - serverTime.getTime() + ServerTimezoneOffset * 1000, "linear");
        return true;
}

function Buildlist() {
        var h           = 0;
        var     m               = 0;
        var s           = (data.build[0].endtime - (serverTime.getTime() / 1000) + ServerTimezoneOffset);
        
        if ( s <= 0 ) {
                        window.location.href = 'game.php?page=buildings';
                if(data.build.length == 1){
                        $('#blc').html(Ready + '<br><a href=?page=build>'+data.bd_continue+'</a>');
                        document.title  = Ready + ' - ' + Gamename;
                        window.setTimeout("window.location.href = 'game.php?page=buildings'", 1000);
                        return true;
                } else if(data.build[0].reload === true){
                        window.location.href = 'game.php?page=buildings';
                        return true;
                } else {
                        window.location.href = 'game.php?page=buildings';
                        return true;
                }
        }
        
        var time        = GetRestTimeFormat(s);
        
        $('#blc').html(time + '<a href="game.php?page=buildings&amp;cmd=cancel"><div class="cancelar_c"><span>'+data.bd_cancel+'</span></div></a>');
        document.title  = time + ' - ' + data.build[0].name + ' - ' + Gamename;
        window.setTimeout('Buildlist();', 1000);
        $('#blc1').html(time);		
}
