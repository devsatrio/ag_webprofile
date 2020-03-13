function validasi(){
    if($('#password').val()!=''){
        if($('#password').val()==$('#kpassword').val()){
            return true;
        }else{
            alert('maaf, konfirmasi password salah');
            return false;
        }
    }else{
        return true;
    }
};