Feature: Post Creation
  Create post workflow using tags
  @javascript
  Scenario: Create post
    Given I am on "/"
    When I click on the link "Create Post"
    Then I should be on "/post/create"
    When I fill in the following "New Post" in field "Title"
    And I click on the link "Add a tag"
    When I fill in the following "New Tag" in field "Name"
    And I press "Submit"
    Then I should be on "/post/list"
    And I should see "New Post"
    And I should see "New Tag"
