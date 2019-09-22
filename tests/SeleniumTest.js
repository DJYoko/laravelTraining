require('dotenv').config();
const webdriver = require('selenium-webdriver');
const { Builder, By } = require('selenium-webdriver');
const assert = require('assert');

let driver;

console.log('\n\n this Test needs [ chromedriver.exe ] on root directory \n\n');

describe('Login Form Test', () => {

  before(() => {
    driver = new Builder().forBrowser('chrome').build();
    process.on('unhandledRejection', console.dir);
  });

  after(() => {
    return driver.quit();
  });

  it('show login page', async () => {
    // goto Login page
    const loginPageUrl = process.env.WEB_ROOT + '/auth/login'
    await driver.get(loginPageUrl);
  });

  it('login submit without input ID/Password', async () => {
    // submit without ID/Password
    const sendButton = driver.findElement(By.className('btn'));
    sendButton.click();

    await driver.wait(webdriver.until.elementLocated(By.className('alert')), 10000).then(()=>{
      driver.findElement(By.className('alert')).getText().then(function(text) {
          const correctAlertText ='The email field is required.\nThe password field is required.'
          assert.equal(correctAlertText, text);
      });

    });
  });

});
