document.addEventListener("DOMContentLoaded", () => {

    const config = {
        logo: "TOTO",
        title: "LAPORAN PERIKSA PER TYPE QC - 12",
    };

    const headerHTML = `
        <header class="qc-header" style="height:58px; position:sticky; top:0; z-index:1000;">
            <div class="qc-header-inner" style="height:34px;">
                <div class="qc-logo" >${config.logo}</div>

                <div class="qc-title">${config.title}</div>

                <div class="qc-meta">
                    <div class="date" id="qc-datetime"></div>
                </div>
            </div>
        </header>
    `;

    document.body.insertAdjacentHTML("afterbegin", headerHTML);

    const dateEl = document.getElementById("qc-datetime");

    function updateClock() {
        const now = new Date();

        const date = now.toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "long",
            year: "numeric"
        });

        const time = now.toLocaleTimeString("id-ID", {
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit"
        });

        dateEl.innerText = `${date} pukul ${time}`;
    }

    updateClock();                 // render pertama
    setInterval(updateClock, 1000); // update tiap detik

    // ============================
    // FILTER TYPE
    // ============================
    console.log("Filter dipilih:", selectedType);
    const typeFilter = document.getElementById("typeFilter");

    if (typeFilter) {

        typeFilter.addEventListener("change", function () {

            const selectedType = this.value;

            document.querySelectorAll("tbody tr").forEach(row => {

                const rowType = row.dataset.type;

                if (!rowType) return; // skip kalau tidak punya data-type

                if (selectedType === "ALL" || rowType === selectedType) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }

            });

        });

    }
});
