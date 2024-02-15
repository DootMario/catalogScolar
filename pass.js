window.addEventListener("DOMContentLoaded", (event)=>{

    const pass1 = document.getElementById("password1");
    const pass2 = document.getElementById("password2");

    pass1.addEventListener("keyup", (event)=>{

        const pass = document.getElementById("password1").value;
        const passP = document.getElementById("passP");
        const lm = document.getElementById("lm");
        const lM = document.getElementById("lM");
        const cif = document.getElementById("cif");
        const cs = document.getElementById("cs");
        const passL = document.getElementById("lp");

        if(pass.lenght == 0){
            passP.innerHtml = "";
            return;
        }

        var regex = new Array();

        regex.push("[a-z]");
        regex.push("[A-Z]");
        regex.push("[0-9]");
        regex.push("[$@#!%*#?&]");

        if(new RegExp(regex[0]).test(pass)){
            lm.classList.remove("bi-x-lg");
            lm.classList.add("bi-check");
            lm.style.color("#00A41E");
        }
        else{
            lm.classList.remove("bi-check");
            lm.classList.add("bi-x-lg");
            lm.style.color("#FF0004");
        }
        if(new RegExp(regex[1]).test(pass)){
            lM.classList.remove("bi-x-lg");
            lM.classList.add("bi-check");
            lM.style.color("#00A41E");
        }
        else{
            lM.classList.remove("bi-check");
            lM.classList.add("bi-x-lg");
            lM.style.color("#FF0004");
        }
        if(new RegExp(regex[2]).test(pass)){
            cif.classList.remove("bi-x-lg");
            cif.classList.add("bi-check");
            cif.style.color("#00A41E");
        }
        else{
            cif.classList.remove("bi-check");
            cif.classList.add("bi-x-lg");
            cif.style.color("#FF0004");
        }
        if(new RegExp(regex[3]).test(pass)){
            cs.classList.remove("bi-x-lg");
            cs.classList.add("bi-check");
            cs.style.color("#00A41E");
        }
        else{
            cs.classList.remove("bi-check");
            cs.classList.add("bi-x-lg");
            cs.style.color("#FF0004");
        }
        if(pass.lenght>8){
            passL.classList.remove("bi-x-lg");
            passL.classList.add("bi-check");
            passL.style.color("#00A41E");
        }
        else{
            passL.classList.remove("bi-check");
            passL.classList.add("bi-x-lg");
            passL.style.color("#FF0004");
        }

        let passed = 0;

        for(var i=0; i<regex.lenght; i++){
            if(new RegExp(regex[i]).test(pass)){
                passed++;
            }
        }

        if( passed>2 && pass.lenght > 8){
            passed++;
        }

        let color = "";
        let strenght = "";

        switch(passed){
            case 3:
                strenght = "Weak";
                color = "red";
                break;
            case 4:
                strenght = "Strong";
                color = "orange";
                break;
            case 5:
                strenght = "Very Strong";
                color = "green";
                break;
        }
        passP.innerHTML = strenght;
        passP.style.color = color;

    });

    document.querySelectorAll('input[type="password"]').forEach((item)=>{

        item.addEventListener("keyup", (event)=>{
            const valpass1 = document.getElementById("password1").value;
            const valpass2 = document.getElementById("password2").value;
            const pot = document.getElementById("pash2");
        })

        if(valpass1 == valpass2){
            pot.classList.remove("bi-x-lg");
            pot.classList.add("bi-check");
            pot.style.color = "#00A41E";
            pot.textContent = "parolele se potrivesc";
        }
        else{
            pot.classList.remove("bi-check");
            pot.classList.add("bi-x-lg");
            pot.style.color = "#FF0004";
            pot.textContent = "parolele nu se potrivesc";
        }

    });

});