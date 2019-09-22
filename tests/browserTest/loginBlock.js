require('dotenv').config();
const webdriver = require('selenium-webdriver');
const { Builder, By } = require('selenium-webdriver');
const assert = require('assert');

let driver;

describe('Login Block Test', () => {
  before(() => {
    driver = new Builder().forBrowser('chrome').build();
    process.on('unhandledRejection', console.dir);
  });

  after(() => {
    return driver.quit();
  });

  it('submit without ID/Password', async () => {
    // goto Login page
    const loginPageUrl = process.env.WEB_ROOT + '/auth/login';
    await driver.get(loginPageUrl);

    // submit
    await driver.findElement(By.className('btn')).click();
    await driver.wait(
      webdriver.until.elementLocated(By.className('alert')),
      10000
    );

    // evaluate result
    const alertText = await driver.findElement(By.className('alert')).getText();
    const correctAlertText =
      'The email field is required.\nThe password field is required.';
    assert.equal(correctAlertText, alertText);
  });

});
