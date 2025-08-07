let u=[];document.getElementById("addIsuBtn").addEventListener("click",function(){const e=document.getElementById("isuSelect"),n=document.getElementById("isuDetail"),s=e.value,t=n.value.trim();!s||!t||(u.push({isu:s,masalah:t}),e.selectedIndex=0,n.value="",c())});function c(){const e=document.getElementById("isuList");e.innerHTML="",u.forEach((n,s)=>{const t=document.createElement("div");t.className="card border border-success p-2",t.innerHTML=`
        <div class="d-flex justify-content-between">
            <div>
                <strong>${n.isu}</strong><br>
                <small>${n.masalah}</small>
            </div>
            <button type="button" class="btn btn-sm btn-danger" onclick="hapusIsu(${s})">Hapus</button>
        </div>
    `,e.appendChild(t)}),document.getElementById("daftarIsuInput").value=JSON.stringify(u)}function d(e){u.splice(e,1),c()}window.hapusIsu=d;
