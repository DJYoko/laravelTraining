const { Builder, By } = require("selenium-webdriver");
const assert = require("assert");

let driver;

console.log("\n\n this Test needs [ chromedriver.exe ] on root directory \n\n");

describe("Login Form Test", () => {

  before(() => {
    driver = new Builder().forBrowser("chrome").build();
    process.on("unhandledRejection", console.dir);
  });

  after(() => {
    return driver.quit();
  });

  it("empty login", async () => {
    // goto Login page
    await driver.get(
      "http://localhost:3500/auth/login"
    );

  });

});
