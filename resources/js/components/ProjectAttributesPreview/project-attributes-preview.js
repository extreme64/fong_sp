/**
 * [Description AwardSetting]
 */
class ProjectAttributesPreview extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {

        const eventBusName = this.getAttribute('event-bus-name');
        this.eventBus = window.eventBuses[eventBusName];


        const username = this.getAttribute('user-name');
        const avatarImg = this.getAttribute('avatar-src');
        const terminalImg = this.getAttribute('terminal-src');
        const backgroundImg = this.getAttribute('background-src');

        this.innerHTML = `
            <style>
               
            </style>
            <div data-ui="wrap" class="attributes-preview flex justify-center items-center rounded-lg bg-cover bg-center bg-no-repeat"  style="background-image: url(../images/${ backgroundImg })">
            

                <div class="flex flex-col items-center m-8">
                    <span>${ username }</span>
                    
                    <img data-ui="avatarPrev" class="flex w-32 rounded-lg border-solid border-4 border-orange-600 bg-gradient-to-b from-red-500 to-yellow-500" src="../images/${ avatarImg }" alt="">

                    <img data-ui="terminalPrev" class="flex w-5/6 rounded-lg" src="../images/${ terminalImg }" alt="">

                    <div class="flex flex-col items-center w-5/6 p-4 rounded-lg bg-gradient-to-b from-yellow-500 to-yellow-500">
                        <span>🔖 Some task name</span>
                        <span>🆙 LEVEL 1</span>
                        <span>🎮 199</span>
                    </div>

                    <div class="flex justify-center w-5/6 m-4 p-4 rounded-lg bg-gradient-to-b from-yellow-500 to-yellow-500">
                        <span data-id="0" class="px-1 border border-solid border-1 rounded border-orange-700" title="I had a vision!">🔮</span>
                        <span data-id="1" class="px-1 border border-solid border-1 rounded border-orange-700" title="I chat with bud GPT!">🔎</span>
                        <span data-id="2" class="px-1 border border-solid border-1 rounded border-orange-700" title="I been monitoring!">📈</span>
                        <span data-id="3" class="px-1 border border-solid border-1 rounded border-orange-700" title="I removed/fixed big bugs!">🔫</span>
                        <span data-id="4" class="px-1 border border-solid border-1 rounded border-orange-700" title="I have less to worry now!">✂️</span>
                        <span data-id="5" class="px-1 border border-solid border-1 rounded border-orange-700" title="I refactor many!">💡</span>
                        <span data-id="6" class="px-1 border border-solid border-1 rounded border-orange-700" title="I did epic code!">💎<span>
                    </div>
                </div>
            </div>
            `;

        const wrap = this.querySelector('[data-ui="wrap"]')
        const avatarImgEl = this.querySelector('[data-ui="avatarPrev"]')
        const terminalImgEl = this.querySelector('[data-ui="terminalPrev"]')
        const backgroungImgEl = wrap


        this.eventBus.addListener('avatarBtnClicked', (event) => {
            avatarImgEl.src = event.awardImageUrl
        });
        this.eventBus.addListener('terminalBtnClicked', (event) => {
            terminalImgEl.src = event.awardImageUrl
        });
        this.eventBus.addListener('backgroundBtnClicked', (event) => {
            // backgroungImgEl.src = event.awardImageUrl
            backgroungImgEl.style.backgroundImage = `url(${event.awardImageUrl})`
        });
           
    }
}

customElements.define('project-attributes-preview', ProjectAttributesPreview);
