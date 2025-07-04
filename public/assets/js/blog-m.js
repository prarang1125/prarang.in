document.addEventListener("DOMContentLoaded", function () {
    const style = document.createElement("style");
    style.textContent = `
      #viveks-modal-container {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.6); display: flex;
        align-items: center; justify-content: center; z-index: 9999;
      }
      #viveks-modal-overlay {
        position: absolute; width: 100%; height: 100%;
      }
      #viveks-modal-box {
        position: relative; background: #fefefe; padding: 25px;
        border-radius: 10px; width: 600px; max-width: 90%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        font-family: 'Segoe UI', sans-serif; color: #333;
        animation: fadeIn 0.3s ease-in-out;
      }
      #viveks-modal-header {
        display: flex; justify-content: space-between;
        align-items: center; font-weight: bold; font-size: 18px;
        margin-bottom: 12px; color: #222;
      }
      #viveks-modal-content {
        min-height: 200px; outline: none; border: 1px solid #ccc;
        padding: 15px; border-radius: 6px; background-color: #fff;
        font-size: 15px; line-height: 1.6;
      }
      #viveks-modal-close {
        background: transparent; border: none; font-size: 22px;
        font-weight: bold; cursor: pointer; color: #888;
      }
      #viveks-modal-close:hover {
        color: #f44336;
      }
      #viveks-modal-content a {
        color: #0077cc;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.2s ease;
      }
      #viveks-modal-content a:hover {
        color: #005fa3;
        text-decoration: underline;
      }
      #viveks-modal-content ul {
        padding-left: 20px;
      }
      #viveks-modal-content li {
        margin-bottom: 8px;
      }
      @keyframes fadeIn {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
      }
    `;
    document.head.appendChild(style);

    const modalHTML = `
      <div id="viveks-modal-container" style="display:none;">
        <div id="viveks-modal-overlay"></div>
        <div id="viveks-modal-box">
          <div id="viveks-modal-header">
            <span>Connections: Related Websites</span>
            <button id="viveks-modal-close">&times;</button>
          </div>
          <div id="viveks-modal-content" contenteditable="false">
            <ul>
              <li><strong>Origins of Prarang</strong> – <a href="https://www.shabdachitra.com/" target="_blank">Shabdachitra Research Methodology</a></li>
    <li><strong>Ownership of Prarang Project</strong> – <a href="https://www.indeur.com/" target="_blank">Indoeuropeans Pvt Ltd Company</a></li>
    <li><strong>Visual History India Research</strong> – <a href="https://www.facebook.com/profile.php?id=100064708301765" target="_blank">India Visual FB Blog</a></li>
    <li><strong>Old Social Design Project</strong> – <a href="https://www.rohmoh.com/" target="_blank">Rohilla Mohalla Project</a></li>
    <li><strong>New World Library Knowledge Project</strong> – <a href="https://sarganga.org/" target="_blank">Saraswati by Ganga</a></li>
    <li><strong>Colours of Prarang Daily Content</strong> – <a href="http://rangmala.com/" target="_blank">Daily Knowledge Posts – Rangmala</a></li>

            <!-- <li><strong>Future Prarang</strong> – <a href="http://apratyaksh.in" target="_blank">Under Development Knowledge Solution – Apratyaksh</a></li>-->
            </ul>
          </div>
        </div>
      </div>
    `;
    document.body.insertAdjacentHTML("beforeend", modalHTML);

    // Open modal on any button with ID = viveks-modal
    document.querySelectorAll("#viveks-modal").forEach((btn) => {
        btn.addEventListener("click", function () {
            document.getElementById("viveks-modal-container").style.display =
                "flex";
        });
    });

    // Close modal logic
    document.getElementById("viveks-modal-close").onclick = function () {
        document.getElementById("viveks-modal-container").style.display =
            "none";
    };
    document.getElementById("viveks-modal-overlay").onclick = function () {
        document.getElementById("viveks-modal-container").style.display =
            "none";
    };
});
