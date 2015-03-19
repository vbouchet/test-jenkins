@api
Feature: Test add content link
  In order to prove the anonymous user can't access the add content link
  As an anonymous
  I should get access denied when visiting the add/content

  Scenario: Test the ability to visit admin/content
    Given I am an anonymous user
    Given I am on "admin/content"
    Then I should get a 403 HTTP response

  Scenario: Test Navigation menu as admin
    Given I am logged in as a user with the administrator role
    Given I am on the homepage
    Then I should see the link "Add content" in the "Sidebar first" region

  Scenario: Test Navigation menu as anonymous
    Given I am an anonymous user
    Given I am on the homepage
    Then I should not see the link "Add content" in the "Sidebar first" region