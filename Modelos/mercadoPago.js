const mp = new MercadoPago('TEST-ac97768c-0f18-44e5-9163-e528aa447305');
const bricksBuilder = mp.bricks();


mp.bricks().create("wallet", "wallet_container", {
    initialization: {
        preferenceId: "wallet_container",
    },
 });
 