CREATE TABLE review (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    drugs_id INT
);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User1', 'Works well for me. Nice Product', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User2', 'No side effects. Good medicine', 1);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User3', 'Effective antibiotic.', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User4', 'Quick recovery. excellent', 1);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User5', 'Controls blood sugar. Great!', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User6', 'Easy to take.', 1);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User7', 'Effective pain relief. Splendid', 2);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User8', 'Good for headaches. Good', 2);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User9', 'Helps with nerve pain. I\'d recommend it', 2);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User10', 'Thank God, No more tingling.', 2);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User11', 'Lowers cholesterol. Impressed!', 2);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User12', 'Better than expected.', 1);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User13', 'Effective for heart health. A+', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User14', 'No side effects. Highly recommend.', 2);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User15', 'Relieves water retention. Life-saver!', 2);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User16', 'Quick results. Happy with the product.', 1);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User17', 'Helps with chest pain. Good medication.', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User18', 'Long-lasting relief. Satisfied customer.', 2);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User19', 'Reduces inflammation. Effective.', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User20', 'Easy on the stomach. Would buy again.', 1);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User21', 'Good painkiller. Happy with the purchase.', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User22', 'Reliable. No complaints.', 2);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User23', 'Lowers blood pressure. Excellent.', 2);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User24', 'Stable results. Impressed with the quality.', 2);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User25', 'Relieves pain quickly. Good price.', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User26', 'Trusted brand. Works well.', 1);

INSERT INTO review (user_name, comment, drugs_id) VALUES ('User27', 'Helps with sleep. Thankful!', 2);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User28', 'No more insomnia. Great product.', 2);

-- Reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User29', 'Improves insulin sensitivity. Very satisfied.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User30', 'Stable blood sugar levels. Effective medication.', 3);

-- Reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User31', 'Relieves pain quickly. Excellent for headaches.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User32', 'Works like a charm. No side effects.', 4);


-- Reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User33', 'Easy to manage. Good for daily use.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User34', 'Improves overall well-being. Satisfied customer.', 3);

-- Reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User35', 'Reliable pain relief. Recommended.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User36', 'Fast-acting. Good for muscle pain.', 4);

-- More reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User37', 'Effective for glucose control. Happy with the results.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User38', 'No issues with digestion. Easy on the stomach.', 3);

-- More reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User39', 'Great for arthritis pain. Would recommend.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User40', 'Affordable and effective. Happy customer.', 4);

-- More reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User41', 'Helps with blood sugar levels. Good for diabetes.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User42', 'Improved energy levels. Satisfied with the product.', 3);

-- More reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User43', 'Effective for joint pain. Happy with the relief.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User44', 'Quick results for pain relief. Reliable.', 4);

-- Additional reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User45', 'Maintains good blood pressure. Recommend it.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User46', 'No side effects. Happy with the purchase.', 3);

-- Additional reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User47', 'Effective for inflammation. Good value for money.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User48', 'Soothing for muscle pain. Great product.', 4);

-- More reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User49', 'Steady glucose levels. Excellent medicine.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User50', 'Easy to include in daily routine. Satisfied.', 3);

-- More reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User51', 'Relieves pain quickly. Recommended for all.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User52', 'Great for arthritis. Happy with the results.', 4);

-- Negative reviews for drugs_id 1
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User53', 'Did not work for me. Disappointed.', 1);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User54', 'Experienced side effects. Not recommended.', 1);

-- Negative reviews for drugs_id 2
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User55', 'No improvement in condition. Waste of money.', 2);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User56', 'Severe side effects. Unpleasant experience.', 2);

-- Negative reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User57', 'Ineffective for diabetes. Not satisfied.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User58', 'Caused stomach issues. Displeased with the product.', 3);

-- Negative reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User59', 'No relief for joint pain. Frustrating.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User60', 'Did not meet expectations. Regret the purchase.', 4);

-- More reviews for drugs_id 3
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User61', 'Not effective for diabetes. Disappointed.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User62', 'Mild improvement. Expected more.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User63', 'Controls blood sugar well. Satisfied customer.', 3);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User64', 'No noticeable results. Waste of money.', 3);

-- More reviews for drugs_id 4
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User65', 'Excellent pain relief. Highly recommended!', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User66', 'Good for joint pain. Happy with the purchase.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User67', 'Severe side effects. Disappointed.', 4);
INSERT INTO review (user_name, comment, drugs_id) VALUES ('User68', 'Quick relief for headaches. Impressed.', 4);

