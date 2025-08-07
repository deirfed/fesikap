document.querySelectorAll(".pulse").forEach(n=>{n.addEventListener("click",function(){document.querySelectorAll(".pulse").forEach(e=>{e.classList.remove("clicked","clicked-glow","pulse-on")}),this.classList.add("clicked","clicked-glow"),this.classList.remove("pulse-on")})});function u(n,e){const o={};return n.forEach((t,r)=>{const a=[],d=Array.isArray(e)?e[r]||0:e;for(let s=0;s<d;s++)a.push(`Kecamatan ${s+1}`);o[t]=a}),o}function p(n){const e={};return Object.entries(n).forEach(([o,t])=>{e[o]={},t.forEach((r,a)=>{const d=Array.from({length:Math.floor(Math.random()*5+3)},(s,c)=>({nama:`Desa ${a+1}.${c+1}`,suara:Math.floor(Math.random()*1e3+100),suara_partai:Math.floor(Math.random()*500+50),tps:Math.floor(Math.random()*10+1)}));e[o][r]={suara:Math.floor(Math.random()*1e4+1e3),suara_partai:Math.floor(Math.random()*5e3+500),tps:d.reduce((s,c)=>s+c.tps,0),desa:d}})}),e}const g=["Kuningan","Ciamis","Banjar","Pangandaran"],i=u(g,[3,3,2,3]),m=p(i);let l=null;document.querySelectorAll("circle[data-kab]").forEach(n=>{n.addEventListener("click",function(){l=this.getAttribute("data-kab");const e=i[l]||[],o=document.getElementById("dropdown-wrapper"),t=document.getElementById("kecamatanDropdown"),r=document.getElementById("kecamatanLabel"),a=document.getElementById("keterangan-kecamatan");r.innerText=`Pilih Kecamatan (Kabupaten ${l}):`,t.innerHTML="<option selected disabled>Pilih kecamatan...</option>",a.innerHTML="",document.getElementById("desa-wrapper").classList.add("d-none"),document.getElementById("desaDropdown").innerHTML="",document.getElementById("keterangan-desa").innerHTML="",e.forEach(d=>{const s=document.createElement("option");s.value=d,s.textContent=d,t.appendChild(s)}),o.classList.remove("d-none")})});document.getElementById("kecamatanDropdown").addEventListener("change",function(){var d;const n=this.value,e=document.getElementById("keterangan-kecamatan"),o=document.getElementById("desa-wrapper"),t=document.getElementById("desaDropdown"),r=document.getElementById("keterangan-desa"),a=(d=m[l])==null?void 0:d[n];a?(e.innerHTML=`
        <div class="border rounded shadow-sm p-3 bg-white">
            <h6 class="mb-3 fw-bold text-dark">Informasi Suara Tingkat Kecamatan:</h6>
            <div class="mb-2"><strong class="text-muted">Kabupaten:</strong>
                <span class="text-success fw-semibold">${l}</span></div>
            <div class="mb-2"><strong class="text-muted">Kecamatan:</strong>
                <span class="text-success fw-semibold">${n}</span></div>
            <div class="mb-2"><strong class="text-muted">Jumlah Suara Calon:</strong>
                <span class="fw-medium">${a.suara.toLocaleString()}</span></div>
            <div class="mb-2"><strong class="text-muted">Jumlah Suara Partai:</strong>
                <span class="fw-medium">${a.suara_partai.toLocaleString()}</span></div>
            <div class="mb-2"><strong class="text-muted">Jumlah TPS:</strong>
                <span class="fw-medium">${a.tps}</span></div>
        </div>`,t.innerHTML="<option selected disabled>Pilih desa...</option>",a.desa.forEach(s=>{const c=document.createElement("option");c.value=s.nama,c.textContent=s.nama,t.appendChild(c)}),o.classList.remove("d-none"),r.innerHTML=""):(e.innerHTML=`
        <div class="alert alert-warning">
            <strong>Data tidak tersedia</strong> untuk kecamatan <span class="text-danger">${n}</span>.
        </div>`,o.classList.add("d-none"),t.innerHTML="",r.innerHTML="")});document.getElementById("desaDropdown").addEventListener("change",function(){var r;const n=this.value,e=document.getElementById("keterangan-desa"),o=document.getElementById("kecamatanDropdown").value,t=(r=m[l])==null?void 0:r[o];if(t&&t.desa){const a=t.desa.find(d=>d.nama===n);a&&(e.innerHTML=`
            <div class="border rounded shadow-sm p-3 bg-light mt-3">
                <h6 class="mb-3 fw-bold text-dark">Informasi Suara Tingkat Desa:</h6>
                <div class="mb-2"><strong class="text-muted">Desa:</strong>
                    <span class="text-primary fw-semibold">${a.nama}</span></div>
                <div class="mb-2"><strong class="text-muted">Jumlah Suara Calon:</strong>
                    <span class="fw-medium">${a.suara.toLocaleString()}</span></div>
                <div class="mb-2"><strong class="text-muted">Jumlah Suara Partai:</strong>
                    <span class="fw-medium">${a.suara_partai.toLocaleString()}</span></div>
                <div class="mb-2"><strong class="text-muted">Jumlah TPS:</strong>
                    <span class="fw-medium">${a.tps}</span></div>
            </div>`)}});
