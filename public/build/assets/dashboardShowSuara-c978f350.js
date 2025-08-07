const d={},b={};function p(a=4,s=3,t=2){for(let e=1;e<=a;e++){const l=`kabupaten-${e}`,i=[];for(let c=1;c<=s;c++){const r=`Kecamatan ${c}`;i.push(r);const m=[];for(let o=1;o<=t;o++)m.push({nama:`Desa ${o}`,suara:100+e*10+c*5+o*3});b[r]=m}d[l]=i}}p();const u=document.getElementById("pilihKab"),n=document.getElementById("pilihKec"),h=document.getElementById("tableContainer");u.addEventListener("change",function(){const a=u.value;n.innerHTML="<option selected disabled>-- Pilih Kecamatan --</option>",d[a]?(d[a].forEach(s=>{const t=document.createElement("option");t.value=s,t.textContent=s,n.appendChild(t)}),n.disabled=!1):n.disabled=!0,h.innerHTML=""});n.addEventListener("change",function(){const a=n.value,t=`
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Desa</th>
                        <th class="text-center">Suara Terbanyak</th>
                    </tr>
                </thead>
                <tbody>
                    ${(b[a]||[]).map((e,l)=>`
                                <tr>
                                    <td class="text-center">${l+1}</td>
                                    <td class="text-center">${e.nama}</td>
                                    <td class="text-center">${e.suara}</td>
                                </tr>
                            `).join("")}
                </tbody>
            </table>
        </div>
    `;h.innerHTML=t});
