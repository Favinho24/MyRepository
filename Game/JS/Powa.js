function MottoPowa(action, character){
  if(!estado5){
      if (action.includes('Wa') && Wa_gold < 7) {
        alert('Fondos Insuficientes');
        return;
      } else if (action.includes('Wi') && Wi_gold < 7) {
        alert('Fondos Insuficientes');
        return;
      }
        ajax5("POST","./php_calculate/UpStats.php","idpj="+character+"&action="+action,"MottoPowa(0, 0)");
        return;
    }else{
        estado5 = false;
        var data = '';
        try {
          data = JSON.parse(mensaje5);
        } catch (e) {
            console.log("JSON Parse error, -> "+e);
        }
        if ((data.nombre).includes('Warrior')) {
          Wa_gold = data.gold;
          Wa_hp_max = data.MH;
          Wa_str = data.str;
          Wa_arm = data.ar;
          document.getElementById('WaGold').innerHTML=Wa_gold;
          document.getElementById('WaMH').innerHTML=Wa_hp_max;
          document.getElementById('WaSt').innerHTML=Wa_str;
          document.getElementById('WaAr').innerHTML=Wa_arm;
        }else if ((data.nombre).includes('Wizard')) {
          Wi_gold = data.gold;
          Wi_hp_max = data.MH;
          Wi_iq = data.iq;
          Wi_rMag = data.RM;
          document.getElementById('WiGold').innerHTML=Wi_gold;
          document.getElementById('WiMH').innerHTML=Wi_hp_max;
          document.getElementById('WiIQ').innerHTML=Wi_iq;
          document.getElementById('WiRM').innerHTML=Wi_rMag;
        }

    }
}

function Salud(name, id) {
  if(!estado5){
      if (name.includes('warrior') && Wa_gold < 100) {
        alert('Fondos Insuficientes');
        return;
      } else if (name.includes('wizard') && Wi_gold < 100) {
        alert('Fondos Insuficientes');
        return;
      }
        ajax5("POST","./php_calculate/salud.php","idpj="+id,"Salud(0, 0)");
        return;
    }else{
        estado5 = false;
        var data = '';
        try {
          data = JSON.parse(mensaje5);
        } catch (e) {
            console.log("JSON Parse error, -> "+e);
        }
        if ((data.nombre).includes('Warrior')) {
          Wa_hp = data.hp;
          Wa_gold = data.gold;
          document.getElementById('hpWa').innerHTML=Wa_hp;
          document.getElementById('WaGold').innerHTML=Wa_gold;
        }else if ((data.nombre).includes('Wizard')) {
          Wi_hp = data.hp;
          Wi_gold = data.gold;
          document.getElementById('hpWi').innerHTML=Wi_hp;
          document.getElementById('WiGold').innerHTML=Wi_gold;
        }

    }
}
