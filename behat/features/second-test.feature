@api
Feature: Test the login block
  In order to prove the anonymous user can login
  As an anonymous
  I should see the login block on the homepage

  Scenario: Test the login block visibility as anonymous
    Given I am an anonymous user
    Given I am on the homepage
    Then I should see the "Sidebar first" region
    Then I should see the text "User login" in the "Sidebar first" region

  Scenario: Test the login block visibility as authenticated user
    Given I am logged in as a user with the "authenticated user" role
    Given I am on the homepage
    Then I should not see the "Sidebar first" region

  Scenario: Test the user menu block visibility as anonymous
    Given I am an anonymous user
    Given I am on the homepage
    Then I should not see the link "Log out"

  Scenario: Test the user menu block visibility as authenticated user
    Given I am logged in as a user with the "authenticated user" role
    Given I am on the homepage
    Then I should see the link "Logout"
    When I visit "user/logout"
    Then I should be on the homepage