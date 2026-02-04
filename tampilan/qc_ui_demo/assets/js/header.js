document.addEventListener("DOMContentLoaded", () => {

    const config = {
        logo: "TOTO",
        title: "LAPORAN QC - 12 (SHIFT B)",
        target: "36.3%"
    };

    const headerHTML = `
        <header class="qc-header">
            <div class="qc-header-inner">
                <div class="qc-logo">${config.logo}</div>

                <div class="qc-title">${config.title}</div>

                <div class="qc-meta">
                    <div class="date" id="qc-datetime"></div>
                    <div class="target">Target Saat Ini : ${config.target}</div>
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
});
